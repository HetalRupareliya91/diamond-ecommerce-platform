import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import WishlistForm from '../../components/Wishlist/WishlistForm';
import wishlistService from '../../services/wishlistService';

export default function WishlistFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) wishlistService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await wishlistService.update(id, values);
      } else {
        await wishlistService.create(values);
      }
      navigate('/wishlists');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Wishlist</h1>
      </header>
      <WishlistForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
