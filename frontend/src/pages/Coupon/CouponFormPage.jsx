import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import CouponForm from '../../components/Coupon/CouponForm';
import couponService from '../../services/couponService';

export default function CouponFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) couponService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await couponService.update(id, values);
      } else {
        await couponService.create(values);
      }
      navigate('/coupons');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Coupon</h1>
      </header>
      <CouponForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
