import apiClient from '../lib/apiClient';

const BASE = '/appointments';

const appointmentService = {
  list: (params = {}) => apiClient.get(BASE, { params }).then((res) => res.data),
  get: (id) => apiClient.get(BASE + '/' + id).then((res) => res.data.data),
  create: (payload) => apiClient.post(BASE, payload).then((res) => res.data.data),
  update: (id, payload) => apiClient.put(BASE + '/' + id, payload).then((res) => res.data.data),
  remove: (id) => apiClient.delete(BASE + '/' + id),
};

export default appointmentService;
