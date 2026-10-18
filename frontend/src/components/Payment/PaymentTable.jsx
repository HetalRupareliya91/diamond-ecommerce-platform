const COLUMNS = [
  { key: 'name', label: 'Name' },
  { key: 'gateway', label: 'Gateway' },
  { key: 'reference', label: 'Reference' },
  { key: 'amount', label: 'Amount' },
  { key: 'status', label: 'Status' },
];

function formatValue(value) {
  if (value === true) return 'Yes';
  if (value === false) return 'No';
  if (value === null || value === undefined || value === '') return '-';
  return String(value);
}

export default function PaymentTable({ items = [], onEdit, onDelete }) {
  if (!items.length) {
    return <p className="empty-state">No payments found.</p>;
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

export { COLUMNS as paymentColumns };
