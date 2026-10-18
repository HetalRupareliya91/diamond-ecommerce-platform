import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import CollectionForm from '../../components/Collection/CollectionForm';
import collectionService from '../../services/collectionService';

export default function CollectionFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) collectionService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await collectionService.update(id, values);
      } else {
        await collectionService.create(values);
      }
      navigate('/collections');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Collection</h1>
      </header>
      <CollectionForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
