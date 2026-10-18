import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import CartItemForm from '../../components/CartItem/CartItemForm';
import cartItemService from '../../services/cartItemService';

export default function CartItemFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) cartItemService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await cartItemService.update(id, values);
      } else {
        await cartItemService.create(values);
      }
      navigate('/cart-items');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Cart Item</h1>
      </header>
      <CartItemForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
