import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import NecklaceForm from '../../components/Necklace/NecklaceForm';
import necklaceService from '../../services/necklaceService';

export default function NecklaceFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) necklaceService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await necklaceService.update(id, values);
      } else {
        await necklaceService.create(values);
      }
      navigate('/necklaces');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Necklace</h1>
      </header>
      <NecklaceForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
