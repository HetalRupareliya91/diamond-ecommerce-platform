import { render, screen } from '@testing-library/react';
import CartItemTable from '../CartItemTable';

describe('CartItemTable', () => {
  it('renders an empty state', () => {
    render(<CartItemTable items={[]} />);
    expect(screen.getByText(/no cart items found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<CartItemTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
