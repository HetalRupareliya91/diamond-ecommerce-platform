import { render, screen } from '@testing-library/react';
import DiamondColorTable from '../DiamondColorTable';

describe('DiamondColorTable', () => {
  it('renders an empty state', () => {
    render(<DiamondColorTable items={[]} />);
    expect(screen.getByText(/no diamond colors found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<DiamondColorTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
