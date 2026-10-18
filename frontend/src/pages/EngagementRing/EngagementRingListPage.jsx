import { useNavigate } from 'react-router-dom';
import EngagementRingTable from '../../components/EngagementRing/EngagementRingTable';
import useEngagementRingList from '../../hooks/useEngagementRingList';
import engagementRingService from '../../services/engagementRingService';

export default function EngagementRingListPage() {
  const navigate = useNavigate();
  const { items, meta, loading, error, params, setParams, reload } = useEngagementRingList({ page: 1 });

  const handleDelete = async (item) => {
    if (!window.confirm('Delete ' + item.name + '?')) return;
    await engagementRingService.remove(item.id);
    reload();
  };

  const goToPage = (page) => setParams({ ...params, page });

  return (
    <section className="page">
      <header className="page-header">
        <h1>Engagement Rings</h1>
        <div className="page-actions">
          <input
            type="search"
            placeholder="Search engagement rings..."
            value={params.search || ''}
            onChange={(e) => setParams({ ...params, search: e.target.value, page: 1 })}
          />
          <button type="button" onClick={() => navigate('/engagement-rings/new')}>Add new</button>
        </div>
      </header>

      {error && <p className="error">{error}</p>}

      {loading ? (
        <p>Loading...</p>
      ) : (
        <EngagementRingTable
          items={items}
          onEdit={(item) => navigate('/engagement-rings/' + item.id + '/edit')}
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
