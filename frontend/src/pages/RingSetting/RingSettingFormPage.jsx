import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import RingSettingForm from '../../components/RingSetting/RingSettingForm';
import ringSettingService from '../../services/ringSettingService';

export default function RingSettingFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) ringSettingService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await ringSettingService.update(id, values);
      } else {
        await ringSettingService.create(values);
      }
      navigate('/ring-settings');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Ring Setting</h1>
      </header>
      <RingSettingForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
