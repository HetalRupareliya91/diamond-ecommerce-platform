import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import CategoryForm from '../../components/Category/CategoryForm';
import categoryService from '../../services/categoryService';

export default function CategoryFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) categoryService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await categoryService.update(id, values);
      } else {
        await categoryService.create(values);
      }
      navigate('/categories');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Category</h1>
      </header>
      <CategoryForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
