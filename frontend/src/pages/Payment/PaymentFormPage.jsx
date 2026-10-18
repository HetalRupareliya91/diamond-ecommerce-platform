import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import PaymentForm from '../../components/Payment/PaymentForm';
import paymentService from '../../services/paymentService';

export default function PaymentFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) paymentService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await paymentService.update(id, values);
      } else {
        await paymentService.create(values);
      }
      navigate('/payments');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Payment</h1>
      </header>
      <PaymentForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
