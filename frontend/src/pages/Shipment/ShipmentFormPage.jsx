import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import ShipmentForm from '../../components/Shipment/ShipmentForm';
import shipmentService from '../../services/shipmentService';

export default function ShipmentFormPage() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [record, setRecord] = useState(null);
  const [errors, setErrors] = useState({});
  const [submitting, setSubmitting] = useState(false);

  useEffect(() => {
    if (id) shipmentService.get(id).then(setRecord);
  }, [id]);

  const handleSubmit = async (values) => {
    setSubmitting(true);
    setErrors({});
    try {
      if (id) {
        await shipmentService.update(id, values);
      } else {
        await shipmentService.create(values);
      }
      navigate('/shipments');
    } catch (err) {
      setErrors((err.response && err.response.data && err.response.data.errors) || {});
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <section className="page">
      <header className="page-header">
        <h1>{id ? 'Edit' : 'New'} Shipment</h1>
      </header>
      <ShipmentForm initialValues={record} onSubmit={handleSubmit} submitting={submitting} errors={errors} />
    </section>
  );
}
