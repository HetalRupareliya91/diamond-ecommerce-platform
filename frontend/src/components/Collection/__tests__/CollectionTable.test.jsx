import { render, screen } from '@testing-library/react';
import CollectionTable from '../CollectionTable';

describe('CollectionTable', () => {
  it('renders an empty state', () => {
    render(<CollectionTable items={[]} />);
    expect(screen.getByText(/no collections found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<CollectionTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
