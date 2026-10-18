import { render, screen } from '@testing-library/react';
import ReviewTable from '../ReviewTable';

describe('ReviewTable', () => {
  it('renders an empty state', () => {
    render(<ReviewTable items={[]} />);
    expect(screen.getByText(/no reviews found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<ReviewTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
