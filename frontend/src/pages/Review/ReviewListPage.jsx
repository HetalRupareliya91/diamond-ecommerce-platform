import { useNavigate } from 'react-router-dom';
import ReviewTable from '../../components/Review/ReviewTable';
import useReviewList from '../../hooks/useReviewList';
import reviewService from '../../services/reviewService';

export default function ReviewListPage() {
  const navigate = useNavigate();
  const { items, meta, loading, error, params, setParams, reload } = useReviewList({ page: 1 });

  const handleDelete = async (item) => {
    if (!window.confirm('Delete ' + item.name + '?')) return;
    await reviewService.remove(item.id);
    reload();
  };

  const goToPage = (page) => setParams({ ...params, page });

  return (
    <section className="page">
      <header className="page-header">
        <h1>Reviews</h1>
        <div className="page-actions">
          <input
            type="search"
            placeholder="Search reviews..."
            value={params.search || ''}
            onChange={(e) => setParams({ ...params, search: e.target.value, page: 1 })}
          />
          <button type="button" onClick={() => navigate('/reviews/new')}>Add new</button>
        </div>
      </header>

      {error && <p className="error">{error}</p>}

      {loading ? (
        <p>Loading...</p>
      ) : (
        <ReviewTable
          items={items}
          onEdit={(item) => navigate('/reviews/' + item.id + '/edit')}
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
