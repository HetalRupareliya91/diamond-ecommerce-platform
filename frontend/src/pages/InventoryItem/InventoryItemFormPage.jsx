import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import InventoryItemForm from '../../components/InventoryItem/InventoryItemForm';
import inventoryItemService from '../../services/inventoryItemService';

export default function InventoryItemFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) inventoryItemService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await inventoryItemService.update(id, values);
      } else {
        await inventoryItemService.create(values);
      }
      navigate('/inventory-items');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Inventory Item</h1>
      </header>
      <InventoryItemForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
