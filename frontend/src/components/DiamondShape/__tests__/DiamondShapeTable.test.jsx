import { render, screen } from '@testing-library/react';
import DiamondShapeTable from '../DiamondShapeTable';

describe('DiamondShapeTable', () => {
  it('renders an empty state', () => {
    render(<DiamondShapeTable items={[]} />);
    expect(screen.getByText(/no diamond shapes found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<DiamondShapeTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
