import { useNavigate } from 'react-router-dom';
import DiamondColorTable from '../../components/DiamondColor/DiamondColorTable';
import useDiamondColorList from '../../hooks/useDiamondColorList';
import diamondColorService from '../../services/diamondColorService';

export default function DiamondColorListPage() {
  const navigate = useNavigate();
  const { items, meta, loading, error, params, setParams, reload } = useDiamondColorList({ page: 1 });

  const handleDelete = async (item) => {
    if (!window.confirm('Delete ' + item.name + '?')) return;
    await diamondColorService.remove(item.id);
    reload();
  };

  const goToPage = (page) => setParams({ ...params, page });

  return (
    <section className="page">
      <header className="page-header">
        <h1>Diamond Colors</h1>
        <div className="page-actions">
          <input
            type="search"
            placeholder="Search diamond colors..."
            value={params.search || ''}
            onChange={(e) => setParams({ ...params, search: e.target.value, page: 1 })}
          />
          <button type="button" onClick={() => navigate('/diamond-colors/new')}>Add new</button>
        </div>
      </header>

      {error && <p className="error">{error}</p>}

      {loading ? (
        <p>Loading...</p>
      ) : (
        <DiamondColorTable
          items={items}
          onEdit={(item) => navigate('/diamond-colors/' + item.id + '/edit')}
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
