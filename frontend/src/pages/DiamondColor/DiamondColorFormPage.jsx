import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import DiamondColorForm from '../../components/DiamondColor/DiamondColorForm';
import diamondColorService from '../../services/diamondColorService';

export default function DiamondColorFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) diamondColorService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await diamondColorService.update(id, values);
      } else {
        await diamondColorService.create(values);
      }
      navigate('/diamond-colors');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Diamond Color</h1>
      </header>
      <DiamondColorForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
