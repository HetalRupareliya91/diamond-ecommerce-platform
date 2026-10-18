import { render, screen } from '@testing-library/react';
import InventoryItemTable from '../InventoryItemTable';

describe('InventoryItemTable', () => {
  it('renders an empty state', () => {
    render(<InventoryItemTable items={[]} />);
    expect(screen.getByText(/no inventory found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<InventoryItemTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
