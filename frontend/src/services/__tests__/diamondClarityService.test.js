import { beforeEach, describe, expect, it, vi } from 'vitest';

vi.mock('../../lib/apiClient', () => ({
  default: { get: vi.fn(), post: vi.fn(), put: vi.fn(), delete: vi.fn() },
}));

import apiClient from '../../lib/apiClient';
import diamondClarityService from '../diamondClarityService';

describe('diamondClarityService', () => {
  beforeEach(() => vi.clearAllMocks());

  it('lists records', async () => {
    apiClient.get.mockResolvedValue({ data: { data: [{ id: 1 }] } });
    const res = await diamondClarityService.list({ page: 1 });
    expect(apiClient.get).toHaveBeenCalledWith('/diamond-clarities', { params: { page: 1 } });
    expect(res.data).toHaveLength(1);
  });

  it('creates a record', async () => {
    apiClient.post.mockResolvedValue({ data: { data: { id: 5 } } });
    const created = await diamondClarityService.create({ name: 'Sample' });
    expect(apiClient.post).toHaveBeenCalledWith('/diamond-clarities', { name: 'Sample' });
    expect(created.id).toBe(5);
  });
});
