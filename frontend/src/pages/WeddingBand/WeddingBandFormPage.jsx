import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import WeddingBandForm from '../../components/WeddingBand/WeddingBandForm';
import weddingBandService from '../../services/weddingBandService';

export default function WeddingBandFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) weddingBandService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await weddingBandService.update(id, values);
      } else {
        await weddingBandService.create(values);
      }
      navigate('/wedding-bands');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Wedding Band</h1>
      </header>
      <WeddingBandForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
