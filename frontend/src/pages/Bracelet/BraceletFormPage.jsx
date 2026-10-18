import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import BraceletForm from '../../components/Bracelet/BraceletForm';
import braceletService from '../../services/braceletService';

export default function BraceletFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) braceletService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await braceletService.update(id, values);
      } else {
        await braceletService.create(values);
      }
      navigate('/bracelets');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Bracelet</h1>
      </header>
      <BraceletForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
