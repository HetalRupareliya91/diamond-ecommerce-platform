import { useNavigate } from 'react-router-dom';
import DiamondTable from '../../components/Diamond/DiamondTable';
import useDiamondList from '../../hooks/useDiamondList';
import diamondService from '../../services/diamondService';

export default function DiamondListPage() {
  const navigate = useNavigate();
  const { items, meta, loading, error, params, setParams, reload } = useDiamondList({ page: 1 });

  const handleDelete = async (item) => {
    if (!window.confirm('Delete ' + item.name + '?')) return;
    await diamondService.remove(item.id);
    reload();
  };

  const goToPage = (page) => setParams({ ...params, page });

  return (
    <section className="page">
      <header className="page-header">
        <h1>Diamonds</h1>
        <div className="page-actions">
          <input
            type="search"
            placeholder="Search diamonds..."
            value={params.search || ''}
            onChange={(e) => setParams({ ...params, search: e.target.value, page: 1 })}
          />
          <button type="button" onClick={() => navigate('/diamonds/new')}>Add new</button>
        </div>
      </header>

      {error && <p className="error">{error}</p>}

      {loading ? (
        <p>Loading...</p>
      ) : (
        <DiamondTable
          items={items}
          onEdit={(item) => navigate('/diamonds/' + item.id + '/edit')}
          onDelete={handleDelete}
        />
      )}

      {meta && meta.last_page > 1 && (
        <nav className="pagination">
          <button type="button" disabled={meta.current_page <= 1} onClick={() => goToPage(meta.current_page - 1)}>
            Previous
          </button>
          <span>Page {meta.current_page} of {meta.last_page}</span>
          <button type="button" disabled={meta.current_page >= meta.last_page} onClick={() => goToPage(meta.current_page + 1)}>
            Next
          </button>
        </nav>
      )}
    </section>
  );
}
