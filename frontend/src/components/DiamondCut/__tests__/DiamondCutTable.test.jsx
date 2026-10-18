import { render, screen } from '@testing-library/react';
import DiamondCutTable from '../DiamondCutTable';

describe('DiamondCutTable', () => {
  it('renders an empty state', () => {
    render(<DiamondCutTable items={[]} />);
    expect(screen.getByText(/no diamond cuts found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<DiamondCutTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
