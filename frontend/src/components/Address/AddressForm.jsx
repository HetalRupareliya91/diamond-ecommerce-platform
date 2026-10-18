import { useEffect, useState } from 'react';

export const addressFields = [
  { name: 'name', label: 'Name', type: 'text', required: true },
  { name: 'line1', label: 'Line1', type: 'text', required: false },
  { name: 'city', label: 'City', type: 'text', required: false },
  { name: 'postal_code', label: 'Postal Code', type: 'text', required: false },
  { name: 'country', label: 'Country', type: 'text', required: false },
];

function emptyValues() {
  return addressFields.reduce(
    (acc, field) => ({ ...acc, [field.name]: field.type === 'checkbox' ? false : '' }),
    {},
  );
}

export default function AddressForm({ initialValues, onSubmit, submitting = false, errors = {} }) {
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
      {addressFields.map((field) => (
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
