import { render, screen } from '@testing-library/react';
import DiamondTable from '../DiamondTable';

describe('DiamondTable', () => {
  it('renders an empty state', () => {
    render(<DiamondTable items={[]} />);
    expect(screen.getByText(/no diamonds found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<DiamondTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
