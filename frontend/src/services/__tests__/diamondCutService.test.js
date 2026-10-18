import { beforeEach, describe, expect, it, vi } from 'vitest';

vi.mock('../../lib/apiClient', () => ({
  default: { get: vi.fn(), post: vi.fn(), put: vi.fn(), delete: vi.fn() },
}));

import apiClient from '../../lib/apiClient';
import diamondCutService from '../diamondCutService';

describe('diamondCutService', () => {
  beforeEach(() => vi.clearAllMocks());

  it('lists records', async () => {
    apiClient.get.mockResolvedValue({ data: { data: [{ id: 1 }] } });
    const res = await diamondCutService.list({ page: 1 });
    expect(apiClient.get).toHaveBeenCalledWith('/diamond-cuts', { params: { page: 1 } });
    expect(res.data).toHaveLength(1);
  });

  it('creates a record', async () => {
    apiClient.post.mockResolvedValue({ data: { data: { id: 5 } } });
    const created = await diamondCutService.create({ name: 'Sample' });
    expect(apiClient.post).toHaveBeenCalledWith('/diamond-cuts', { name: 'Sample' });
    expect(created.id).toBe(5);
  });
});
