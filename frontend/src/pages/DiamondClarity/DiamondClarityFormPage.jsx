import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import DiamondClarityForm from '../../components/DiamondClarity/DiamondClarityForm';
import diamondClarityService from '../../services/diamondClarityService';

export default function DiamondClarityFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) diamondClarityService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await diamondClarityService.update(id, values);
      } else {
        await diamondClarityService.create(values);
      }
      navigate('/diamond-clarities');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Diamond Clarity</h1>
      </header>
      <DiamondClarityForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
