import { useNavigate } from 'react-router-dom';
import CategoryTable from '../../components/Category/CategoryTable';
import useCategoryList from '../../hooks/useCategoryList';
import categoryService from '../../services/categoryService';

export default function CategoryListPage() {
  const navigate = useNavigate();
  const { items, meta, loading, error, params, setParams, reload } = useCategoryList({ page: 1 });

  const handleDelete = async (item) => {
    if (!window.confirm('Delete ' + item.name + '?')) return;
    await categoryService.remove(item.id);
    reload();
  };

  const goToPage = (page) => setParams({ ...params, page });

  return (
    <section className="page">
      <header className="page-header">
        <h1>Categories</h1>
        <div className="page-actions">
          <input
            type="search"
            placeholder="Search categories..."
            value={params.search || ''}
            onChange={(e) => setParams({ ...params, search: e.target.value, page: 1 })}
          />
          <button type="button" onClick={() => navigate('/categories/new')}>Add new</button>
        </div>
      </header>

      {error && <p className="error">{error}</p>}

      {loading ? (
        <p>Loading...</p>
      ) : (
        <CategoryTable
          items={items}
          onEdit={(item) => navigate('/categories/' + item.id + '/edit')}
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
