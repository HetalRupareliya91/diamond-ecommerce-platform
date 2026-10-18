import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import CustomerForm from '../../components/Customer/CustomerForm';
import customerService from '../../services/customerService';

export default function CustomerFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) customerService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await customerService.update(id, values);
      } else {
        await customerService.create(values);
      }
      navigate('/customers');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Customer</h1>
      </header>
      <CustomerForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
