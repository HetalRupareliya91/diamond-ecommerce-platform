import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import DiamondForm from '../../components/Diamond/DiamondForm';
import diamondService from '../../services/diamondService';

export default function DiamondFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) diamondService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await diamondService.update(id, values);
      } else {
        await diamondService.create(values);
      }
      navigate('/diamonds');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Diamond</h1>
      </header>
      <DiamondForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
