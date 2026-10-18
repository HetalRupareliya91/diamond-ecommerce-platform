import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import OrderForm from '../../components/Order/OrderForm';
import orderService from '../../services/orderService';

export default function OrderFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) orderService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await orderService.update(id, values);
      } else {
        await orderService.create(values);
      }
      navigate('/orders');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Order</h1>
      </header>
      <OrderForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
