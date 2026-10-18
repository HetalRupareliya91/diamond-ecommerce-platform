import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import DiamondShapeForm from '../../components/DiamondShape/DiamondShapeForm';
import diamondShapeService from '../../services/diamondShapeService';

export default function DiamondShapeFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) diamondShapeService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await diamondShapeService.update(id, values);
      } else {
        await diamondShapeService.create(values);
      }
      navigate('/diamond-shapes');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Diamond Shape</h1>
      </header>
      <DiamondShapeForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
