import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import MetalForm from '../../components/Metal/MetalForm';
import metalService from '../../services/metalService';

export default function MetalFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) metalService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await metalService.update(id, values);
      } else {
        await metalService.create(values);
      }
      navigate('/metals');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Metal</h1>
      </header>
      <MetalForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
