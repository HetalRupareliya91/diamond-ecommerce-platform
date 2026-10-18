import { render, screen } from '@testing-library/react';
import MetalTable from '../MetalTable';

describe('MetalTable', () => {
  it('renders an empty state', () => {
    render(<MetalTable items={[]} />);
    expect(screen.getByText(/no metals found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<MetalTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
