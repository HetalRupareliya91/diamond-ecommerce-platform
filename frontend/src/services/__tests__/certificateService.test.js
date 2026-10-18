import { beforeEach, describe, expect, it, vi } from 'vitest';

vi.mock('../../lib/apiClient', () => ({
  default: { get: vi.fn(), post: vi.fn(), put: vi.fn(), delete: vi.fn() },
}));

import apiClient from '../../lib/apiClient';
import certificateService from '../certificateService';

describe('certificateService', () => {
  beforeEach(() => vi.clearAllMocks());

  it('lists records', async () => {
    apiClient.get.mockResolvedValue({ data: { data: [{ id: 1 }] } });
    const res = await certificateService.list({ page: 1 });
    expect(apiClient.get).toHaveBeenCalledWith('/certificates', { params: { page: 1 } });
    expect(res.data).toHaveLength(1);
  });

  it('creates a record', async () => {
    apiClient.post.mockResolvedValue({ data: { data: { id: 5 } } });
    const created = await certificateService.create({ name: 'Sample' });
    expect(apiClient.post).toHaveBeenCalledWith('/certificates', { name: 'Sample' });
    expect(created.id).toBe(5);
  });
});
