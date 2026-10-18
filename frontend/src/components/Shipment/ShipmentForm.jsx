import { useEffect, useState } from 'react';

export const shipmentFields = [
  { name: 'name', label: 'Name', type: 'text', required: true },
  { name: 'carrier', label: 'Carrier', type: 'text', required: false },
  { name: 'tracking_number', label: 'Tracking Number', type: 'text', required: false },
  { name: 'shipped_on', label: 'Shipped On', type: 'date', required: false },
  { name: 'status', label: 'Status', type: 'text', required: false },
];

function emptyValues() {
  return shipmentFields.reduce(
    (acc, field) => ({ ...acc, [field.name]: field.type === 'checkbox' ? false : '' }),
    {},
  );
}

export default function ShipmentForm({ initialValues, onSubmit, submitting = false, errors = {} }) {
  const [values, setValues] = useState(emptyValues());

  useEffect(() => {
    if (initialValues) setValues({ ...emptyValues(), ...initialValues });
  }, [initialValues]);

  const handleChange = (e) => {
    const { name, type, value, checked } = e.target;
    setValues((prev) => ({ ...prev, [name]: type === 'checkbox' ? checked : value }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    onSubmit(values);
  };

  return (
    <form className="form" onSubmit={handleSubmit} noValidate>
      {shipmentFields.map((field) => (
        <label key={field.name} className={'form-field form-field--' + field.type}>
          <span>{field.label}</span>
          {field.type === 'textarea' ? (
            <textarea name={field.name} value={values[field.name] ?? ''} onChange={handleChange} rows={4} />
          ) : field.type === 'checkbox' ? (
            <input type="checkbox" name={field.name} checked={Boolean(values[field.name])} onChange={handleChange} />
          ) : (
            <input
              type={field.type}
              name={field.name}
              value={values[field.name] ?? ''}
              onChange={handleChange}
              step={field.type === 'number' ? 'any' : undefined}
              required={field.required}
            />
          )}
          {errors[field.name] && <small className="error">{errors[field.name][0]}</small>}
        </label>
      ))}
      <button type="submit" disabled={submitting}>{submitting ? 'Saving...' : 'Save'}</button>
    </form>
  );
}
