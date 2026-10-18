import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import AddressForm from '../../components/Address/AddressForm';
import addressService from '../../services/addressService';

export default function AddressFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) addressService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await addressService.update(id, values);
      } else {
        await addressService.create(values);
      }
      navigate('/addresses');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Address</h1>
      </header>
      <AddressForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
