import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import CertificateForm from '../../components/Certificate/CertificateForm';
import certificateService from '../../services/certificateService';

export default function CertificateFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) certificateService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await certificateService.update(id, values);
      } else {
        await certificateService.create(values);
      }
      navigate('/certificates');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Certificate</h1>
      </header>
      <CertificateForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
