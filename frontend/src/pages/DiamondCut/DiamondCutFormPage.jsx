import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import DiamondCutForm from '../../components/DiamondCut/DiamondCutForm';
import diamondCutService from '../../services/diamondCutService';

export default function DiamondCutFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) diamondCutService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await diamondCutService.update(id, values);
      } else {
        await diamondCutService.create(values);
      }
      navigate('/diamond-cuts');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Diamond Cut</h1>
      </header>
      <DiamondCutForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
