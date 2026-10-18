import { render, screen } from '@testing-library/react';
import EarringTable from '../EarringTable';

describe('EarringTable', () => {
  it('renders an empty state', () => {
    render(<EarringTable items={[]} />);
    expect(screen.getByText(/no earrings found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<EarringTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
