import { render, screen } from '@testing-library/react';
import CategoryTable from '../CategoryTable';

describe('CategoryTable', () => {
  it('renders an empty state', () => {
    render(<CategoryTable items={[]} />);
    expect(screen.getByText(/no categories found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<CategoryTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
