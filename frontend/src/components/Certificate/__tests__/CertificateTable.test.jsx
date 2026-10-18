import { render, screen } from '@testing-library/react';
import CertificateTable from '../CertificateTable';

describe('CertificateTable', () => {
  it('renders an empty state', () => {
    render(<CertificateTable items={[]} />);
    expect(screen.getByText(/no certificates found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<CertificateTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
