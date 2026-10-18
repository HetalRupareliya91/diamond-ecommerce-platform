import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import EngagementRingForm from '../../components/EngagementRing/EngagementRingForm';
import engagementRingService from '../../services/engagementRingService';

export default function EngagementRingFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) engagementRingService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await engagementRingService.update(id, values);
      } else {
        await engagementRingService.create(values);
      }
      navigate('/engagement-rings');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Engagement Ring</h1>
      </header>
      <EngagementRingForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
