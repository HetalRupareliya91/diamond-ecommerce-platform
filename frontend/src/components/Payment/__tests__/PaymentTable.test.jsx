import { render, screen } from '@testing-library/react';
import PaymentTable from '../PaymentTable';

describe('PaymentTable', () => {
  it('renders an empty state', () => {
    render(<PaymentTable items={[]} />);
    expect(screen.getByText(/no payments found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<PaymentTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
