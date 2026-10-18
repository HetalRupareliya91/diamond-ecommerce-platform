import { useNavigate } from 'react-router-dom';
import DiamondClarityTable from '../../components/DiamondClarity/DiamondClarityTable';
import useDiamondClarityList from '../../hooks/useDiamondClarityList';
import diamondClarityService from '../../services/diamondClarityService';

export default function DiamondClarityListPage() {
  const navigate = useNavigate();
  const { items, meta, loading, error, params, setParams, reload } = useDiamondClarityList({ page: 1 });

  const handleDelete = async (item) => {
    if (!window.confirm('Delete ' + item.name + '?')) return;
    await diamondClarityService.remove(item.id);
    reload();
  };

  const goToPage = (page) => setParams({ ...params, page });

  return (
    <section className="page">
      <header className="page-header">
        <h1>Diamond Clarities</h1>
        <div className="page-actions">
          <input
            type="search"
            placeholder="Search diamond clarities..."
            value={params.search || ''}
            onChange={(e) => setParams({ ...params, search: e.target.value, page: 1 })}
          />
          <button type="button" onClick={() => navigate('/diamond-clarities/new')}>Add new</button>
        </div>
      </header>

      {error && <p className="error">{error}</p>}

      {loading ? (
        <p>Loading...</p>
      ) : (
        <DiamondClarityTable
          items={items}
          onEdit={(item) => navigate('/diamond-clarities/' + item.id + '/edit')}
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
