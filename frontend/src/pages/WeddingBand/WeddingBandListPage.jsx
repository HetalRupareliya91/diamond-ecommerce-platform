import { useNavigate } from 'react-router-dom';
import WeddingBandTable from '../../components/WeddingBand/WeddingBandTable';
import useWeddingBandList from '../../hooks/useWeddingBandList';
import weddingBandService from '../../services/weddingBandService';

export default function WeddingBandListPage() {
  const navigate = useNavigate();
  const { items, meta, loading, error, params, setParams, reload } = useWeddingBandList({ page: 1 });

  const handleDelete = async (item) => {
    if (!window.confirm('Delete ' + item.name + '?')) return;
    await weddingBandService.remove(item.id);
    reload();
  };

  const goToPage = (page) => setParams({ ...params, page });

  return (
    <section className="page">
      <header className="page-header">
        <h1>Wedding Bands</h1>
        <div className="page-actions">
          <input
            type="search"
            placeholder="Search wedding bands..."
            value={params.search || ''}
            onChange={(e) => setParams({ ...params, search: e.target.value, page: 1 })}
          />
          <button type="button" onClick={() => navigate('/wedding-bands/new')}>Add new</button>
        </div>
      </header>

      {error && <p className="error">{error}</p>}

      {loading ? (
        <p>Loading...</p>
      ) : (
        <WeddingBandTable
          items={items}
          onEdit={(item) => navigate('/wedding-bands/' + item.id + '/edit')}
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
