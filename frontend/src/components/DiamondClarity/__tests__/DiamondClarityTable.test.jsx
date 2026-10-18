import { render, screen } from '@testing-library/react';
import DiamondClarityTable from '../DiamondClarityTable';

describe('DiamondClarityTable', () => {
  it('renders an empty state', () => {
    render(<DiamondClarityTable items={[]} />);
    expect(screen.getByText(/no diamond clarities found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<DiamondClarityTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
