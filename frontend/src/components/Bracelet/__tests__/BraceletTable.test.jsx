import { render, screen } from '@testing-library/react';
import BraceletTable from '../BraceletTable';

describe('BraceletTable', () => {
  it('renders an empty state', () => {
    render(<BraceletTable items={[]} />);
    expect(screen.getByText(/no bracelets found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<BraceletTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
