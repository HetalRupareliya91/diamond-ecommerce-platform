import { render, screen } from '@testing-library/react';
import OrderTable from '../OrderTable';

describe('OrderTable', () => {
  it('renders an empty state', () => {
    render(<OrderTable items={[]} />);
    expect(screen.getByText(/no orders found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<OrderTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
