const COLUMNS = [
  { key: 'name', label: 'Name' },
  { key: 'sku', label: 'Sku' },
  { key: 'length_cm', label: 'Length Cm' },
  { key: 'price', label: 'Price' },
];

function formatValue(value) {
  if (value === true) return 'Yes';
  if (value === false) return 'No';
  if (value === null || value === undefined || value === '') return '-';
  return String(value);
}

export default function BraceletTable({ items = [], onEdit, onDelete }) {
  if (!items.length) {
    return <p className="empty-state">No bracelets found.</p>;
  }

  return (
    <table className="data-table">
      <thead>
        <tr>
          {COLUMNS.map((col) => (
            <th key={col.key}>{col.label}</th>
          ))}
          <th aria-label="actions" />
        </tr>
      </thead>
      <tbody>
        {items.map((item) => (
          <tr key={item.id}>
            {COLUMNS.map((col) => (
              <td key={col.key}>{formatValue(item[col.key])}</td>
            ))}
            <td className="actions">
              {onEdit && <button type="button" onClick={() => onEdit(item)}>Edit</button>}
              {onDelete && (
                <button type="button" className="danger" onClick={() => onDelete(item)}>Delete</button>
              )}
            </td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}

export { COLUMNS as braceletColumns };
