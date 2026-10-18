import { useCallback, useEffect, useState } from 'react';
import earringService from '../services/earringService';

export default function useEarringList(initialParams = {}) {
  const [items, setItems] = useState([]);
  const [meta, setMeta] = useState(null);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);
  const [params, setParams] = useState(initialParams);

  const load = useCallback(async () => {
    setLoading(true);
    setError(null);
    try {
      const res = await earringService.list(params);
      setItems(res.data || []);
      setMeta(res.meta || null);
    } catch (err) {
      setError(err.message || 'Failed to load earrings');
    } finally {
      setLoading(false);
    }
  }, [params]);

  useEffect(() => {
    load();
  }, [load]);

  return { items, meta, loading, error, params, setParams, reload: load };
}
